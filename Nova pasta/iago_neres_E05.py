#! python3
# _*_ UTF-8 _*_
# Exercício 5 - Quebrando a banca.

import sys

enterF = open(sys.argv[1], "r")
listEnter = [element.split() for element in enterF]
enterF.close()

listValues, listReduces = [], []
for n in range(len(listEnter)):
    if n % 2 != 0:
        listValues.append([elem for elem in listEnter[n][0]])
    else:
        listReduces.append((int(listEnter[n][0]) - int(listEnter[n][1])))

listResult = []
for i in range(len(listValues)):
    temp = 0
    if listReduces[0] == 1:
        temp = max(listValues[i])
        listResult.append(temp)
    else:
        listTemp = []
        indexNumber = (listReduces[i] - 1)
        listAux = listValues[i]
        cont = listReduces[i]
        for i in range(cont, 0, -1):
            if (indexNumber >= 1):
                maxNumber = max(listAux[0:(-indexNumber)])
                listTemp.append(max(listAux[0:(-indexNumber)]))
                aux = (listAux.index(max(listAux[0:(-indexNumber)]))) + 1
                del listAux[0:aux]
            else:
                maxNumber = max(listAux)
                listTemp.append(maxNumber)
            indexNumber -= 1
        listResult.append(listTemp)

outF = open(sys.argv[2], "w")
listResult = ["".join(elem) + "\n" for elem in listResult]
for elem in listResult:
    outF.write(elem)
outF.close()
