from fastapi import FastAPI, HTTPException, Depends, Query
from fastapi.middleware.cors import CORSMiddleware
from sqlalchemy import create_engine, Column, Integer, String, Text, ForeignKey, DateTime
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker, relationship, Session
from typing import List, Optional
from pydantic import BaseModel
from datetime import datetime

# Configuración directa de la base de datos
DATABASE_URL = "mysql+pymysql://root:@127.0.0.1:3306/PiWellnessHub"

# Crear el engine de SQLAlchemy
engine = create_engine(DATABASE_URL)
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()

# Definir los modelos de SQLAlchemy
class GrupoMuscular(Base):
    __tablename__ = "grupos_musculares"

    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String(255), nullable=False)
    created_at = Column(DateTime, default=datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.utcnow, onupdate=datetime.utcnow)

    ejercicios = relationship("Ejercicio", back_populates="grupo_muscular")

class Ejercicio(Base):
    __tablename__ = "ejercicios"

    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String(255), nullable=False)
    descripcion = Column(Text, nullable=True)
    categoria = Column(String(255), nullable=True)
    grupo_muscular_id = Column(Integer, ForeignKey("grupos_musculares.id"))
    ruta_imagen = Column(String(255), nullable=True)
    created_at = Column(DateTime, default=datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.utcnow, onupdate=datetime.utcnow)

    grupo_muscular = relationship("GrupoMuscular", back_populates="ejercicios")

# Definir los modelos de Pydantic para la API
class GrupoMuscularBase(BaseModel):
    nombre: str

class GrupoMuscularCreate(GrupoMuscularBase):
    pass

class GrupoMuscularResponse(GrupoMuscularBase):
    id: int
    created_at: datetime
    updated_at: datetime

    class Config:
        orm_mode = True

class EjercicioBase(BaseModel):
    nombre: str
    descripcion: Optional[str] = None
    categoria: Optional[str] = None
    grupo_muscular_id: int
    ruta_imagen: Optional[str] = None

class EjercicioCreate(EjercicioBase):
    pass

class EjercicioResponse(EjercicioBase):
    id: int
    created_at: datetime
    updated_at: datetime
    grupo_muscular: GrupoMuscularResponse

    class Config:
        orm_mode = True

# Funciones de dependencia
def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

# Crear la aplicación FastAPI
app = FastAPI(title="Biblioteca de Ejercicios API")

# Configurar CORS
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # En producción, limitar a dominios específicos
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Endpoint para obtener todos los grupos musculares
@app.get("/api/grupos-musculares/", response_model=List[GrupoMuscularResponse])
def get_grupos_musculares(db: Session = Depends(get_db)):
    try:
        grupos = db.query(GrupoMuscular).all()
        return grupos
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Error al obtener grupos musculares: {str(e)}")

# Endpoint para obtener todos los ejercicios
@app.get("/api/ejercicios/", response_model=List[EjercicioResponse])
def get_ejercicios(
    grupo_muscular_id: Optional[int] = Query(None, description="Filtrar por grupo muscular"),
    db: Session = Depends(get_db)
):
    try:
        query = db.query(Ejercicio)
        if grupo_muscular_id:
            query = query.filter(Ejercicio.grupo_muscular_id == grupo_muscular_id)
        ejercicios = query.all()
        return ejercicios
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Error al obtener ejercicios: {str(e)}")

# Endpoint para obtener un ejercicio por ID
@app.get("/api/ejercicios/{ejercicio_id}", response_model=EjercicioResponse)
def get_ejercicio(ejercicio_id: int, db: Session = Depends(get_db)):
    try:
        ejercicio = db.query(Ejercicio).filter(Ejercicio.id == ejercicio_id).first()
        if not ejercicio:
            raise HTTPException(status_code=404, detail="Ejercicio no encontrado")
        return ejercicio
    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Error al obtener el ejercicio: {str(e)}")

# Ejecutar con: uvicorn main:app --reload
if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8000)
