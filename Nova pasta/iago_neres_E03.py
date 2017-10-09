#_*_ utf-8 _*_
# Exercicio 3 - Peca perdida
import sys

enterF = open(sys.argv[1], "r")
listEnter = [element.split() for element in enterF]
enterF.close()

amountNumber = int(listEnter[0][0])
listA, listB = [ele for ele in range(1, amountNumber+1)], [int(ele) for ele in listEnter[1]]
setA, setB = set(listA), set(listB)
absence = list(setA.difference(setB))

outF = open(sys.argv[2], "w")
outF.write(str(absence[0]))
outF.close()
