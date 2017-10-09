#! python3
# _*_ UTF-8 _*_
# Exercício 6 - Batalha Naval.

import sys

''' Functions '''
def identifiesShip(x, y):
    if (x < 0 or x > line-1 or y < 0 or y > column-1):
        return
    elif board[x][y] != '#':
        return
    else:
        board[x][y] = amountShips
        leftover[amountShips] += 1

        identifiesShip(x - 1, y)
        identifiesShip(x, y - 1)
        identifiesShip(x + 1, y)
        identifiesShip(x, y + 1)

''' Enter '''
enterF = open(sys.argv[1], 'r')
listEnter = [element.split() for element in enterF]

listTemp = []
board, shots = [], []
for t in range(len(listEnter)):
    if t == 0:
        sizeBoard = [int(elem) for elem in listEnter[t]]
        line, column = sizeBoard[0], sizeBoard[1]
    elif t > 0 and t < sizeBoard[0]+1:
        board.append([elem for elem in listEnter[t][0]])
    elif t == sizeBoard[0]+1:
        amountShots = int(listEnter[t][0])
    else:
        shots.append(listEnter[t])
enterF.close()

''' Main '''
amountShips, leftover = 0, []
for i in range(line):
    for j in range(column):
        if board[i][j] == '#':
            leftover.append(0)
            identifiesShip(i, j)
            amountShips += 1


destroyedShips = 0
for shot in shots:
    x, y = int(shot[0])-1, int(shot[1])-1
    if board[x][y] != '.':
        leftover[board[x][y]] -= 1
        if leftover[board[x][y]] == 0:
            destroyedShips += 1

''' Out '''
outF = open(sys.argv[2], 'w')
outF.write(str(destroyedShips))
outF.close()
