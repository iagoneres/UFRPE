#! python3
# _*_ UTF-8 _*_
# Exercício 7 - Juvenal não tem o que fazer.

import sys

''' Fuctions '''
def newFuction(n):
    global newCont
    if n == 1:
        n = 1
        newCont +=1
    else:
        if n%2 == 0:
            n = n/2
            newCont += 1
            newFuction(n)
        else:
            n = n*3+1
            newCont += 1
            newFuction(n)

''' Enter '''
enterF = open(sys.argv[1], 'r')
cont, T, A, B = 0, 0, [], []
for elem in enterF:
    if cont == 0:
        T = int(elem)
    else:
        aux = elem.split()
        A.append(int(aux[0])), B.append(int(aux[1]))
    cont += 1
enterF.close()

''' Main '''
vMax = []
for x in range(T): #numero de casos
    lista = []
    for y in range(A[x], B[x]+1):
        newCont = 0
        newFuction(y)
        lista.append(newCont)
    vMax.append(max(lista))

''' Out '''
f_out = open(sys.argv[2], "w")
for i in range(T):
    f_out.write("Caso " + str(i+1) + ": " + str(vMax[i]) + "\n")
f_out.close()
