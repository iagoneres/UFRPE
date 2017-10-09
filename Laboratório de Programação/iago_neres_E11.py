#! python3
# Exercício 11 - Juvenal se perdeu.

import sys


class Node:

    def __init__(self, key = None, value = None):
        self._key = key
        self._value = value
        self._father = None
        self._leftSon = None
        self._rightSon = None

    def __str__(self):
        return 'Key: ' + str(self._key) + '\n' + 'Value: ' + str(self._value)

    def setKey(self, key):
        self._key = key

    def setValue(self, value):
        self._value = value

    def setFather(self, father):
        self._father = father

    def setLeftSon(self, leftSon):
        self._leftSon = leftSon

    def setRightSon(self, rightSon):
        self._rightSon = rightSon

    def getKey(self):
        return self._key

    def getValue(self):
        return self._value

    def getFather(self):
        return self._father

    def getLeftSon(self):
        return self._leftSon

    def getRightSon(self):
        return self._rightSon


class BinaryTree:

    def __init__(self):
        self._root = None

    def setRoot(self, root):
        self._root = root

    def getRoot(self):
        return self._root

    def treeSearch(self, startNode, key):
        node = startNode
        if node is None:
            return None
        while node is not None and key != node.getKey():
            if key < node.getKey():
                node = node.getLeftSon()
            else:
                node = node.getRightSon()
        return node

    def treeMinimum(self, node):
        while node.getLeftSon() is not None:
            node = node.getLeftSon()
        return node

    def treeMaximum(self, node):
        while node.getRightSon() is not None:
            node = node.getRightSon()
        return node

    def treePredecessor(self, node):
        if node.getLeftSon() is not None:
            predecessor = self.treeMaximum(node.getLeftSon())
        else:
            predecessor = node.getFather()
            while predecessor is not None and node == predecessor.getLeftSon():
                node = predecessor
                predecessor = predecessor.getFather()
        if node.getKey() == predecessor.getKey():
            predecessor = self.treePredecessor(predecessor)
        return predecessor

    def treeSuccessor(self, node):
        if node.getRightSon() is not None:
            return self.treeMinimum(node.getRightSon())
        successor = node.getFather()
        while successor is not None and node == successor.getRightSon():
            node = successor
            successor = successor.getFather()
        return successor

    def treeInsert(self, key): # Caso seja necessário pode inserir o atributo "value".
        newNode = Node(key)
        if self.getRoot() is None:
            self.setRoot(newNode)
        else:
            self.insertSon(self.getRoot(), newNode)

    def insertSon(self, father, son):
        if son.getKey() <= father.getKey():
            if father.getLeftSon() is None:
                father.setLeftSon(son)
                son.setFather(father)
            else:
                self.insertSon(father.getLeftSon(), son)
        else:
            if father.getRightSon() is None:
                father.setRightSon(son)
                son.setFather(father)
            else:
                self.insertSon(father.getRightSon(), son)

    def transplant(self, node, son):
        if node.getFather() is None:
            self._root = son
        elif node == node.getFather().getLeftSon():
            node.getFather().setLeftSon(son)
        else:
            node.getFather().setRightSon(son)
        if son is not None:
            son.setFather(node.getFather())

    def treeDelete(self, node):
        if node.getLeftSon() is None:
            self.transplant(node, node.getRightSon())
        elif node.getRightSon() is None:
            self.transplant(node, node.getLeftSon())
        else:
            son = self.treeMinimum(node.getRightSon())
            if son.getFather() != node:
                self.transplant(son, son.getRightSon())
                son.setRightSon(node.getRightSon())
                son.getRightSon().setFather(son)
            self.transplant(node, son)
            son.setLeftSon(node.getLeftSon())
            son.getLeftSon().setFather(son)

    def remove(self, node):
        if node.getLeftSon() == None or node.getRightSon() == None:
            y = node
        else:
            y = self.treeSuccessor(node)
        if y.getLeftSon != None:
            x = y.getLeftSon()
        else:
            x = y.getRightSon()
        if x != None:
            x.setFather(y.getFather)
        if y.getFather == None:
            self.setRoot(x)
        elif y == y.getFather().getLeftSon():
            y.getFather().setLeftSon(x)
        else:
            y.getFather().setRightSon(x)
        if y != node:
            node.setKey(y.getKey())
        return y

    def preOrderTreeWalk(self, node, list):
        if node is not None:
            list.append(node.getKey())
            self.preOrderTreeWalk(node.getLeftSon(), list)
            self.preOrderTreeWalk(node.getRightSon(), list)

    def inOrderTreeWalk(self, node, list):
        if node is not None:
            self.inOrderTreeWalk(node.getLeftSon(), list)
            list.append(node.getKey())
            self.inOrderTreeWalk(node.getRightSon(), list)

    def postOrderTreeWalk(self, node, list):
        if node is not None:
            self.postOrderTreeWalk(node.getLeftSon(), list)
            self.postOrderTreeWalk(node.getRightSon(), list)
            list.append(node.getKey())

enterF = open(sys.argv[1], 'r')
listEnter = [element.split() for element in enterF]
enterF.close()
amount = int(listEnter[0][0])

i, instance, listOut = 0, 0, []
for lines in listEnter:
    if listEnter[i][0] == 'A': # Inserir um nodo.
        tree.treeInsert(int(listEnter[i][1]))

    elif listEnter[i][0] == 'B': #Apagar um nodo.
        node = tree.treeSearch(tree.getRoot(), int(listEnter[i][1]))
        if node is not None:
            tree.treeDelete(node)

    elif listEnter[i][0] == 'C':
        node = tree.treeSearch(tree.getRoot(), int(listEnter[i][1]))
        try:
            result = tree.treePredecessor(node).getKey()
        except:
            result = 0
        listOut.append(result)

    elif listEnter[i][0] == 'PRE':
        if tree.getRoot() is not None:
            result = []
            tree.preOrderTreeWalk(tree.getRoot(), result)
        else:
            result = 0
        listOut.append(result)

    elif listEnter[i][0] == 'IN':
        if tree.getRoot() is not None:
            result = []
            tree.inOrderTreeWalk(tree.getRoot(), result)
        else:
            result = 0
        listOut.append(result)

    elif listEnter[i][0] == 'POST':
        if tree.getRoot() is not None:
            result = []
            tree.postOrderTreeWalk(tree.getRoot(), result)
        else:
            result = 0
        listOut.append(result)
    else:
        tree = BinaryTree()
        result = 'Caso %d:' %(instance+1)
        listOut.append(result)
        instance+= 1
    i += 1

outF = open(sys.argv[2], 'w')
for elem in listOut:
    if isinstance(elem, list):
        for i in range(len(elem)):
            if i != len(elem)-1:
                outF.write(str(elem[i]) + ' ')
            else:
                outF.write(str(elem[i]))
        outF.write('\n')
    else:
        outF.write(str(elem) + '\n')
