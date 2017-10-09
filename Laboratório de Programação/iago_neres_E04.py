#_*_ utf-8 _*_
# Exercicio 4 - Tabuleiro Danificado
import sys

def drop(x, y):
    if x == 1 and y == 3 or x == 2 and y == 3 or x == 2 and y == 5 or x == 5 and y == 4:
        return True
    else:
        return False

def movement(action):
    global x, y
    if action == 1:
        x += 1
        y += 2
    elif action == 2:
        x += 2
        y += 1
    elif action == 3:
        x += 2
        y -= 1
    elif action == 4:
        x += 1
        y -= 2
    elif action == 5:
        x -= 1
        y -= 2
    elif action == 6:
        x -= 2
        y -= 1
    elif action == 7:
        x -= 2
        y += 1
    else:
        x -= 1
        y += 2

enterF = open(sys.argv[1], "r")
listEnter = [element.split() for element in enterF]
enterF.close()

x, y = 4, 3
result = 0
for i in range(0, int(listEnter[0][0])):
    movement(int(listEnter[1][i]))
    result += 1
    if drop(x, y):
        break
    else:
        continue

outF = open(sys.argv[2], "w")
outF.write(str(result))
outF.close()
