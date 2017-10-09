#! python3
# Exercício 10 - Notação Polonesa

import sys

class Node:
    def __init__(self, value=None):
        self._value = value
        self._previous = None
        self._next = None

    ''' Display '''

    def __str__(self):
        return str(self._value)

    ''' Set & Get '''

    def setValue(self, value):
        self._value = value

    def setPrevious(self, previous):
        self._previous = previous

    def setNext(self, next):
        self._next = next

    def getValue(self):
        return self._value

    def getPrevious(self):
        return self._previous

    def getNext(self):
        return self._next


class DoubleLinkedList():
    def __init__(self):
        self._begin = None
        self._end = None
        self._amount = 0

    ''' Display '''

    def __str__(self):
        temp = self._begin
        out = ''
        while temp is not None:
            a = temp.getKey()
            out += str(a) + ' '
            temp = temp.getNext()
        return out[:-1]

    ''' Set & Get '''

    def setBegin(self, begin):
        self._begin = begin

    def setEnd(self, end):
        self._end = end

    def getBegin(self):
        return self._begin.getKey()

    def getEnd(self):
        return self._end.getKey()

    def setAmount(self, value):
        self._amount += value

    def getAmount(self):
        return self._amount

    '''  Methods '''

    def insertAtBegin(self, value):
        newNode = Node(value)
        if self._begin is None:
            self.setBegin(newNode)
            self.setEnd(newNode)
        else:
            newNode.setNext(self._begin)
            self._begin.setPrevious(newNode)
            self.setBegin(newNode)
        self.setAmount(1)

    def insertAtEnd(self, value):
        newNode = Node(value)
        if self._begin is None:
            self.setBegin(newNode)
            self.setEnd(newNode)
        else:
            newNode.setPrevious(self._end)
            self._end.setNext(newNode)
            self.setEnd(newNode)
        self.setAmount(1)

    def removeAtBegin(self):
        currentNode, currentNodeValue = self._begin, self.getBegin()
        previous, next = currentNode.getPrevious(), currentNode.getNext()
        if currentNode.getPrevious() is None and currentNode.getNext() is None:
            self._begin = self._end = None
        else:
            next.setPrevious(None)
            self.setBegin(next)
            currentNode.setPrevious(None) and currentNode.setNext(None)
        self.setAmount(-1)
        return currentNodeValue

    def removeAtEnd(self):
        currentNode, currentNodeValue = self._end, self.getEnd()
        previous, next = currentNode.getPrevious(), currentNode.getNext()
        if currentNode.getPrevious() == None and currentNode.getNext() == None:
            self._begin = self._end = None
        else:
            previous.setNext(None)
            self.setEnd(previous)
            currentNode.setPrevious(None) and currentNode.setNext(None)
        self.setAmount(-1)
        return currentNodeValue

    def searchNode(self, value):
        currentNode = self._begin
        while currentNode != None and currentNode.getKey() != value:
            currentNode = currentNode.getNext()
        return currentNode

class Stack(DoubleLinkedList):
    def pushStack(self, value):
        self.insertAtEnd(value)
    def popStack(self):
        value = self.removeAtEnd()
        return value

enterF = open(sys.argv[1], 'r')
listEnter = [element.split() for element in enterF]
enterF.close()

operation = Stack()
for expression in listEnter:
    for i in range(len(expression)-1, -1, -1) :
        if expression[i] == '+' or expression[i] == '-' or expression[i] == '*' or expression[i] == '/':
            a = operation.popStack()
            b = operation.popStack()

            if expression[i] == '+':
                result = a + b
                operation.pushStack(result)

            elif expression[i] == '-':
                result = a - b
                operation.pushStack(result)

            elif expression[i] == '*':
                result = a * b
                operation.pushStack(result)

            else:
                result = int(a/b)
                operation.pushStack(result)

        else:
            operation.pushStack(int(expression[i]))

outList = [operation.removeAtBegin() for elem in range (operation.getAmount())]
outF = open(sys.argv[2], "w")
for elem in outList:
    outF.write(str(elem) + '\n')
outF.close()