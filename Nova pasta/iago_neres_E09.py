#! python3
# Exercício 9 - Juvenal não quer lavar a louça.

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
            out += a + ' '
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

class Queue(DoubleLinkedList):
    def pushQueue(self, value):
        self.insertAtEnd(value)

    def popQueue(self):
        value = self.removeAtBegin()
        return value

class Deck(Queue):
    def listDeck(self, deck):
        for i in range(len(deck)):
            self.pushQueue(deck[i])

    def show(self):
        card = self.getBegin()
        return card

    def discard(self):
        self.popQueue()

    def shuffle(self):
        card = self.popQueue()
        self.pushQueue(card)

''' ENTER '''
enterF = open(sys.argv[1], 'r')
cont, deck = 0, []
for elem in enterF:
    if cont == 0:
        amountParty = int(elem)
    else:
        deck.append(elem.split())
    cont +=1
enterF.close()

''' MAIN '''
i, j, outList = 0, 0, []
while amountParty > 0:
    if j == 0:
        results, index, reverseIndex = 1000, 0, 0
        table = deck[i]             # Variável temporária que guarada o valor do deck da mesa.
    elif deck[i][0] != '-1':
        currentPlayer, currentTable = Deck(), Deck()
        currentTable.listDeck(table)
        currentPlayer.listDeck(deck[i])
        rounds = 0
        while currentPlayer.getAmount() > 0:
            if rounds < 1000 and results > rounds:
                if currentTable.show() == currentPlayer.show():
                    currentPlayer.discard()
                else:
                    currentPlayer.shuffle()
                currentTable.shuffle()
            else:
                rounds = 1000
                break
            rounds += 1
        if results > rounds:
            results = rounds
            index = j
    else:
        outList.append(index)
        amountParty -= 1
        j = -1
    j += 1
    i += 1

''' OUT '''
outF = open(sys.argv[2], "w")
for elem in outList:
    outF.write(str(elem) + '\n')
outF.close()
