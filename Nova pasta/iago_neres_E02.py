#_*_ utf-8 _*_
# Exercicio 2 - Deteccao de colisoes
import sys

enterF = open(sys.argv[1], "r")
listEnter = [element.split() for element in enterF]
enterF.close()

x0, y0, w0, h0 = [int(elem) for elem in listEnter[0]]
x1, y1, w1, h1 = [int(elem) for elem in listEnter[1]]

if (x0 <= (x1 + w1) and (x0 + w0) >= x1 and y0 <= (y1 + h1) and (y0 + h0) >= y1):
    result = "1"
else:
    result = "0"

outF = open(sys.argv[2], "w")
outF.write(result)
outF.close()
