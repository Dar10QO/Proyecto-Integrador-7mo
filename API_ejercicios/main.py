import os
from dotenv import load_dotenv
from fastapi import FastAPI, Depends, HTTPException, Query
from fastapi.middleware.cors import CORSMiddleware
from sqlalchemy import create_engine, Column, Integer, String, Text, ForeignKey
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker, relationship, Session
from typing import List, Optional
from pydantic import BaseModel

# Cargar las variables del archivo .env
load_dotenv()

# Obtener las variables de entorno
DB_HOST = os.getenv("DB_HOST")
DB_PORT = os.getenv("DB_PORT")
DB_NAME = os.getenv("DB_NAME")
DB_USER = os.getenv("DB_USER")
DB_PASSWORD = os.getenv("DB_PASSWORD")

# Crear la URL de la base de datos
DATABASE_URL = f"mysql+pymysql://{DB_USER}:{DB_PASSWORD}@{DB_HOST}:{DB_PORT}/{DB_NAME}"

# Configuración de la base de datos
engine = create_engine(DATABASE_URL)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()

# Modelos SQLAlchemy
class GrupoMuscularDB(Base):
    __tablename__ = "grupos_musculares"

    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String(255), nullable=False)
    ejercicios = relationship("EjercicioDB", back_populates="grupo_muscular")

class EjercicioDB(Base):
    __tablename__ = "ejercicios"

    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String(255), nullable=False)
    descripcion = Column(Text)
    categoria = Column(String(255))
    grupo_muscular_id = Column(Integer, ForeignKey("grupos_musculares.id"))
    ruta_imagen = Column(String(255))
    created_at = Column(String(255))
    updated_at = Column(String(255))

    grupo_muscular = relationship("GrupoMuscularDB", back_populates="ejercicios")

# Modelos Pydantic para la API
class GrupoMuscular(BaseModel):
    id: int
    nombre: str

    class Config:
        orm_mode = True

class Ejercicio(BaseModel):
    id: int
    nombre: str
    descripcion: Optional[str] = None
    categoria: Optional[str] = None
    grupo_muscular_id: int
    ruta_imagen: Optional[str] = None

    class Config:
        orm_mode = True

class EjercicioCompleto(Ejercicio):
    grupo_muscular: GrupoMuscular

    class Config:
        orm_mode = True

# Dependencia para obtener la sesión de la base de datos
def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

# Inicialización de la aplicación FastAPI
app = FastAPI(
    title="API de Ejercicios Fitness",
    description="API para acceder a la biblioteca de ejercicios fitness",
    version="1.0.0"
)

# Configuración de CORS para permitir solicitudes desde tu frontend Laravel
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # En producción, especifica los dominios permitidos
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Rutas de la API
@app.get("/api/grupos-musculares", response_model=List[GrupoMuscular], tags=["Grupos Musculares"])
def get_grupos_musculares(db: Session = Depends(get_db)):
    """
    Obtiene todos los grupos musculares disponibles.
    """
    return db.query(GrupoMuscularDB).all()

@app.get("/api/ejercicios", response_model=List[EjercicioCompleto], tags=["Ejercicios"])
def get_ejercicios(
    grupo_muscular_id: Optional[int] = Query(None, description="Filtrar por ID de grupo muscular"),
    db: Session = Depends(get_db)
):
    """
    Obtiene la lista de ejercicios con opción de filtrado por grupo muscular.
    """
    query = db.query(EjercicioDB).join(GrupoMuscularDB)

    if grupo_muscular_id:
        query = query.filter(EjercicioDB.grupo_muscular_id == grupo_muscular_id)

    return query.all()

@app.get("/api/ejercicios/{ejercicio_id}", response_model=EjercicioCompleto, tags=["Ejercicios"])
def get_ejercicio(ejercicio_id: int, db: Session = Depends(get_db)):
    """
    Obtiene los detalles de un ejercicio específico por su ID.
    """
    ejercicio = db.query(EjercicioDB).filter(EjercicioDB.id == ejercicio_id).first()
    if not ejercicio:
        raise HTTPException(status_code=404, detail="Ejercicio no encontrado")
    return ejercicio

# Para ejecutar la aplicación localmente:
# uvicorn main:app --reload
