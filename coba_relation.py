from sqlalchemy import (
    create_engine,
    Table,
    Column,
    Integer,
    String,
    MetaData,
    Date,
    ForeignKey,
)

from sqlalchemy.orm import declarative_base, relationship
from sqlalchemy_utils import *


Base = declarative_base()

engine = create_engine("mysql+pymysql://root:@localhost/coba_relation")
if not database_exists(engine.url):
    create_database(engine.url)


class Parent(Base):
    __tablename__ = "parent"
    id = Column(Integer, primary_key=True)
    children = relationship("Child")


class Child(Base):
    __tablename__ = "child"
    id = Column(Integer, primary_key=True)
    parent_id = Column(Integer, ForeignKey("parent.id"))


Base.metadata.create_all(engine)
