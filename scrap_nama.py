import requests as req
from bs4 import BeautifulSoup as bes4

url = "https://id.theasianparent.com/nama-bayi-laki-laki-indonesia"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

nama_laki_laki = []
# print(page_soup.prettify())
for pagess in page_soup.find_all("strong"):
    nama_laki_laki.append(pagess.get_text())

nama_laki_laki.pop()
print(len(nama_laki_laki))

url = "https://id.theasianparent.com/nama-bayi-laki-laki-islam"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

for pagess in page_soup.select("ol > li > strong"):
    nama_laki_laki.append(pagess.get_text())
for pagess in page_soup.select("ol > li > b"):
    nama_laki_laki.append(pagess.get_text())

print(len(nama_laki_laki))

url = "https://id.theasianparent.com/nama-bayi-laki-laki-modern"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")


for pagess in page_soup.select("ul > li > strong"):
    nama_laki_laki.append(pagess.get_text())
for pagess in page_soup.select("ul > li > b"):
    nama_laki_laki.append(pagess.get_text())

print(len(nama_laki_laki))


print(nama_laki_laki)
