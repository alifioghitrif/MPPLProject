from sqlalchemy import (
    create_engine,
    Table,
    Column,
    Integer,
    String,
    MetaData,
    Date,
    ForeignKey,
    insert,
)
from sqlalchemy.orm import declarative_base, relationship
from sqlalchemy_utils import create_database, database_exists
import json
import random

Base = declarative_base()

db_master = create_engine("mysql+pymysql://root:@localhost/information_schema")
db_master.execute("DROP DATABASE IF EXISTS coba_sqlalchemy")

engine = create_engine("mysql+pymysql://root:@localhost/coba_sqlalchemy")
if not database_exists(engine.url):
    create_database(engine.url)


class wargadesa(Base):
    __tablename__ = "WargaDesa"
    WargaID = Column(Integer, autoincrement=True, primary_key=True)
    tang = Column(Date)


Base.metadata.create_all(engine)

stmt = insert(wargadesa).values(tang="2022-10-11")
with engine.connect() as conn:
    conn.execute(stmt)

stmt = insert(wargadesa).values(tang="2022-03-11")
with engine.connect() as conn:
    conn.execute(stmt)

stmt = insert(wargadesa).values(tang="20-03-11")
with engine.connect() as conn:
    conn.execute(stmt)

stmt = insert(wargadesa).values(tang="20-25-30")
with engine.connect() as conn:
    conn.execute(stmt)


# from datetime import datetime

# date_string = "2021-12-31 15:37"
# hasil = datetime.strptime(date_string, "%Y-%m-%d %H:%M").date()
# print(hasil)

# stmt = insert(wargadesa).values(tang=hasil)
# with engine.connect() as conn:
#     conn.execute(stmt)

import datetime

start_date = datetime.date(2011, 1, 1)
end_date = datetime.date(2014, 1, 1)

dates_2011_2013 = [start_date + datetime.timedelta(n) for n in range(int((end_date - start_date).days))]


for i in dates_2011_2013:
    stmt = insert(wargadesa).values(tang=i)
    with engine.connect() as conn:
        conn.execute(stmt)
ending = datetime.date.today().year
starting = dates_2011_2013[0].year
# print(dir(ending))
print(starting)
print(ending)
hasil = ending - starting
print(hasil)
