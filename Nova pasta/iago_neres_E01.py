#_*_ utf-8 _*_
# Exercicio 1 - Inverso modular
import sys

enterF = open(sys.argv[1], "r")
listEnter = [element.split() for element in enterF]
enterF.close()

caseNumber = int(listEnter[0][0])
result = []
for i in range(1, caseNumber+1):
    a, c = listEnter[i]
    for b in range(int(listEnter[i][1])):
        if (int(a)*b)%int(c) == 1:
            result.append(str(b))
            break
    else:
        result.append("muito difícil")

outF = open(sys.argv[2], "w")
for i in range(len(result)):
    outF.write("Caso %d: " %(i+1) + result[i] + "\n")
outF.close()
