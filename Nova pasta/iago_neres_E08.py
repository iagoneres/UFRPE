#! python3
# Exercício 8 - Times

import sys

''' HeapSort '''
def heapSort(lista):
  for begin in range((len(lista)-2)//2, -1, -1):
    siftDown(lista, begin, len(lista) - 1)

  for end in range(len(lista)-1, 0, -1):
      lista[end], lista[0] = lista[0], lista[end]
      siftDown(lista, 0, end - 1)
  return lista

def siftDown(lista, begin, end):
  bigger = begin
  while True:
    son = bigger * 2 + 1
    if son > end: break
    if son + 1 <= end and lista[son] < lista[son + 1]:
      son += 1
    if lista[bigger] < lista[son]:
        lista[bigger], lista[son] = lista[son], lista[bigger]
        bigger = son
    else:
      break

''' Reverse QuickSort '''
def quickSort(enterList, p, r):
    if p < r:
        q = partition(enterList, p, r)
        quickSort(enterList, p, q-1)
        quickSort(enterList, q+1, r)

def partition(enterList, p, r):
    x = enterList[r]
    i = p - 1
    for j in range(p, r):
        if enterList[j] >= x:
            i += 1
            enterList[i], enterList[j] = enterList[j], enterList[i]
    enterList[i+1], enterList[r] = enterList[r], enterList[i+1]
    return i+1

''' Enter '''
enterF = open(sys.argv[1], 'r')
listEnter = [element.split() for element in enterF]
enterF.close()

''' Main '''
amountPlayers, amountTeams = int(listEnter[0][0]), int(listEnter[0][1])
player = []
for i in range(1, amountPlayers+1):
    player.append([int(listEnter[i][1]), listEnter[i][0]])

quickSort(player, 0, len(player)-1)

team = []
for m in range(amountTeams):
    temp = []
    for n in range(m, amountPlayers, amountTeams):
        temp.append(player[n][1])
    heapSort(temp)
    team.append(temp)

''' Out '''
outF = open(sys.argv[2], 'w')
for x in range(len(team)):
    outF.write('Time %d\n' %(x+1))
    for elem in(team[x]):
        outF.write(elem + '\n')
    outF.write('\n')
outF.close()
