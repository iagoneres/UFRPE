# SmartOutlook
### Documento de Requisitos do Sistema  
  
**Aluno**: Iago Neres B. do Nascimento  
  
  
## 1. Introdução

Este documento possui as especificações dos requisitos do sistema Smart**Outlook**, de forma a fornecer ao desenvolvedor as informações necessárias para o projeto e implementação, assim como para a realização dos testes e homologação do sistema.

### 1.1. Visão Geral do Documento

Além desta seção introdutória, as seções seguintes estão dipostas da seguinte forma:

1. **Seção 2 - Descrição Geral do Sistema:**  Apresenta uma visão geral do sistema, caracterizando qual é o seu escopo e descrevendo seus usuários.
2. **Seção 3 - Requisitos funcionais (casos de uso):** Específica todos os casos de uso do sistema, descrevendo os fluxos de eventos, prioridades, atores, entradas e saídas de cada caso de uso a ser implementado. 
3. **Seção 4 - Requisitos não-funcionais:** Específica todos os requisitos não funcionais do sistema, divididos em requisitos de usabilidade, confiabilidade, desempenho, segurança, distribuição, adequação a padrões e requisitos de hardware e software.
4. **Seção 5 - Diagrama UML Caso de Uos:** Imagem com representação do cenário, dos eventos e do ator.
5. **Seção 6 - Plano de entregas:** Plano de desenvolvimento com entregas semanais.
6. **Seção 7 - Referências:** Apresenta referências para outros documentos utilizados para a confecção deste documento.

### 1.2. Convenções, Termos e Abreviações

Para estabelecer a prioridade dos requisitos, nas seções 4 e 5, foram adotadas as denominações “essencial”, “importante” e “desejável”.

1. **Essencial** é o requisito sem o qual o sistema não entra em funcionamento. Requisitos essenciais são requisitos imprescindíveis, que têm que ser implementados impreterivelmente.

2. **Importante** é o requisito sem o qual o sistema entra em funcionamento, mas de forma não satisfatória. Requisitos importantes devem ser implementados, mas, se não forem, o sistema poderá ser implantado e usado mesmo assim.

3. **Desejável** é o requisito que não compromete as funcionalidades básicas do sistema, isto é, o sistema pode funcionar de forma satisfatória sem ele. Requisitos desejáveis podem ser deixados para versões posteriores do sistema, caso não haja tempo hábil para implementá-los na versão que está sendo especificada.  
  
## 2. Descrição Geral do Sistema

### 2.1 Abrangência e Sistemas Relacionados

SmartOutlook é uma plataforma web, que irá utilizar imagens de satélites da NASA e dados de sensores climáticos de regiões urbanas para identificar zonas de ilhas de calor, e fazer um cruzamento com o conhecimento retirado das redes de design verde para melhorar a qualidade vida da população e minimizar os efeitos da mudança climática.  
Utilizando o sistema o usuário(Em geral, habitantes da regiões monitoradas ou especilistas designados por entendades públicas responsáveis) poderá fazer análises sobre as condições de sua região e utilizar isso para basear as medidas cabíveis para a sua situação, seja desde de que espécime de planta deve ser alocada para melhorar as condições climáticas daquela região, até se aquele local é propício para hortas urbanas. Além disso o sistema será alimentado de manerira colaborativa por meio dos usuários, que podem informar ocorrências como queda de árvore, árvores que necessitam de poda, utilização indevida de terrenos para déposito de lixos, ou até um novo local para um jardim/horta comunitária. Essas informações irão ser disponibilizdas para os outros usuários que podem avaliar, fazendo com que usuários que possuam boas avalições possuma informações mais confiáveis. 

## 3. Requisitos Funcionais

### 3.1. Cadastro

* **[RF001] Criar usuário.**
  * Prioridade: Essencial.
  * Descrição: Este caso de uso permite que o usuário crie uma conta e armazene suas informações no sistema.
  * Entrada e pré-condições: Não possui.
  * Saídas e pós-condições: Um usuário é cadastro no sistema.

* **[RF002] Excluir usuário.**
  * Prioridade: Essencial.
  * Descrição: Este caso de uso permite que o usuário exclua sua conta.
  * Entrada e pré-condições: Recebe de entrada a conta que usuário deseja excluir.
  * Saídas e pós-condições: O usuário exclui sua conta.
  
* **[RF003] Alterar usuário.**
  * Prioridade: Essencial.
  * Descrição: Este caso de uso altere as informações da sua conta.
  * Entrada e pré-condições: Recebe de entrada a conta que usuário deseja alterar.
  * Saídas e pós-condições: O usuário altera sua conta no sistema.
  
* **[RF004] Criar ocorrência.**
  * Prioridade: Essencial.
  * Descrição: Este caso insere uma ocorrência no sistema.
  * Entrada e pré-condições: Recebe de entrada a conta do usuário que deseja criar a ocorrência.
  * Saídas e pós-condições: Uma ocorrência é inserida no sistema.
  
* **[RF005] Alterar ocorrência.**
  * Prioridade: Essencial.
  * Descrição: Este caso altera uma ocorrência no sitema.
  * Entrada e pré-condições: Recebe de entrada a conta do usuário que deseja alterar a ocorrência e a ocorrência.
  * Saídas e pós-condições: Uma ocorrência é alterada no sistema.
  
* **[RF006] Excluir ocorrência.**
  * Prioridade: Essencial.
  * Descrição: Este caso exclui uma ocorrência no sistema.
  * Entrada e pré-condições: Recebe de entrada a conta do usuário que deseja excluir a ocorrência e a ocorrência.
  * Saídas e pós-condições: Uma ocorrência é excluida do sistema.

### 3.2. Interface

* **[RF001] Visualizar Usuário.**
  * Prioridade: Desejável.
  * Descrição: Este caso permite que um usuário visualize os dados do perfil do usuário.
  * Entrada e pré-condições: Recebe de entrada a conta do usuário que deseja visualizar.
  * Saídas e pós-condições: O usuário visualiza o perfil desejado.
  
* **[RF002] Visualizar Ocorrência.**
  * Prioridade: Essencial.
  * Descrição: Este caso permite que um usuário visualize uma ocorrência no sistema.
  * Entrada e pré-condições: Recebe de entrada a conta do usuário que deseja visualizar e a ocorrência.
  * Saídas e pós-condições: O usuário visualiza informações da ocorrência desejada.

* **[RF003] Visualizar Imagens de Satélite.**
  * Prioridade: Importante.
  * Descrição: Este caso permite que um usuário visualize imagens de satélite que geram um mapa de calor.
  * Entrada e pré-condições: Não possui.
  * Saídas e pós-condições: O usuário visualiza informações do mapa de calor da região desejada.
  
* **[RF004] Visualizar Informações dos Sensores.**
  * Prioridade: Importante.
  * Descrição: Este caso permite que um usuário visualize dados dos sensores.
  * Entrada e pré-condições: Não possui.
  * Saídas e pós-condições: O usuário visualiza informações dos sensores região desejada.

### 3.3. Simulação

* **[RF001] Simular adaptação de espécime de planta.**
  * Prioridade: Desejável.
  * Descrição: Este caso permite que um usuário simule a adaptação de uma espécime dada uma certa região.
  * Entrada e pré-condições: Recebe de entrada a espécime e a região.
  * Saídas e pós-condições: O usuário visualiza a avaliação de quão adaptável aquela espécime está para aquela região.
 
* **[RF002] Simular horta comunitária.**
  * Prioridade: Desejáve.
  * Descrição: Este caso permite que um usuário simule é possível uma horta e quais elementos vegetais são indicados.
  * Entrada e pré-condições: Recebe de entrada a região.
  * Saídas e pós-condições: O usuário visualiza a avaliação dos elementos vegetais que são indicados para aquela região.
  
## 4. Requisitos Não-Funcionais

* **[NF001] Usabilidade.**
  * Prioridade: Essencial.
  * Descrição: A interface do sistema é de extrema relevância para o engajamento do usuário. Para isso será utilizado os metódos mais recentes de UX (experiência do usuário). Este metódo engloba questões desde do design, como de usuabilidade e seu conteúdo. Buscando torna a experiência do usuário com o sistema mais natural e simples. 
  
* **[NF002] Desempenho.**
  * Prioridade: Importante.
  * Descrição: Apesar de não ser um fator essencial para utilização do sistema, é importante para o funcionamento satisfatório do sistema, de forma a contribuir com a experiência do usuário.
  
* **[NF003] Hardware e Software.**
  * Prioridade: Importante
  * Descrição: Buscando a flexibilidade, facilidade de acesso, e a mínima exigência memória física do usuário, foram adotadas como ferramentas  as tecnologias HTML5, CSS3, JavaScript e PHP. Com a utilização dessas ferramentas o sistema fica livre para ser utilizado em *desktops e *mobiles independente de seus sistemas operacionais e com exigência mínima de seus *hardwares.

## 5. Diagrama UML Caso de Uso.

![Diagrama UML Caso de Uso](http://i.imgur.com/5aEqkm3.png)

## 6. Plano de Entrega

### 6.1. Tabela

|Entrega |Data      | Descrição                                                                     | Responsável                 |
|:------:|:---------:|:------------------------------------------------------------------------------|:---------------------------:|
| 1      |04/07/2017 | Definição dos requisitos a serem implementados no Projeto Smart**Outlook**.   | Iago Neres B. do Nascimento |
| 2      |11/07/2017 | Implementação dos requisitos referentes ao **Cadastro**.                      | Iago Neres B. do Nascimento |
| 3      |18/07/2017 | Implementação dos requisitos referentes a **Interface**. (RF001)(RF002).      | Iago Neres B. do Nascimento |
| 4      |25/07/2017 | Implementação dos requisitos referentes a **Interface**. (RF003)(RF004).      | Iago Neres B. do Nascimento |
| 5      |01/08/2017 | Realização de testes e ajustes nos requisitos implementados anteriormente.(1) | Iago Neres B. do Nascimento |
| 6      |08/08/2017 | Implementação dos requisitos referentes a **Simulação** (RF001).              | Iago Neres B. do Nascimento |
| 7      |15/08/2017 | Implementação dos requisitos referentes a **Simulação** (RF002).              | Iago Neres B. do Nascimento |
| 8      |22/08/2017 | Realização de testes e ajustes nos requisitos implementados anteriormente.(2) | Iago Neres B. do Nascimento |
| 9      |29/08/2017 | Realização de testes e ajustes nos requisitos implementados anteriormente.(3) | Iago Neres B. do Nascimento |

### 6.2. Situação das entregas

- [x] **Entrega 1** - Definição dos requisitos a serem implementados no Projeto Smart**Outlook**.
- [ ] **Entrega 2** - Implementação dos requisitos referentes ao **Cadastro**. .
- [ ] **Entrega 3** - Implementação dos requisitos referentes a **Interface**. (RF001)(RF002).
- [ ] **Entrega 4** - Implementação dos requisitos referentes a **Interface**. (RF003)(RF004).
- [ ] **Entrega 5** - Realização de testes e ajustes nos requisitos implementados anteriormente.(1)
- [ ] **Entrega 6** - Implementação dos requisitos referentes a **Simulação** (RF001). 
- [ ] **Entrega 7** - Implementação dos requisitos referentes a **Simulação** (RF002).   
- [ ] **Entrega 8** - Realização de testes e ajustes nos requisitos implementados anteriormente.(2)
- [ ] **Entrega 9** - Realização de testes e ajustes nos requisitos implementados anteriormente.(3)

## 7. Referências

1. Batty, M; Axhausen, KW; Giannotti, F; Pozdnoukhov, A; Bazzani, A; Wachowicz, M; Ouzounis, G; (2012) Smart cities of the future. The European Physical Journal Special Topics , 214 (1) pp. 481-518. 10.1140/epjst/e2012-01703-3.

2. Estudo revela as ilhas de calor do Recife [UFPE]
https://www.ufpe.br/agencia/clipping/index.php?option=com_content&view=article&id=11421:estudo-revela-as-ilhas-de-calor-do-recife&catid=258&Itemid=243

3. Estudo aponta ilhas de calor no Recife, zonas em que a população pode ter saúde prejudicada.[NE10] http://blogs.ne10.uol.com.br/jamildo/2013/05/27/estudo-aponta-ilhas-de-calor-no-recife-zonas-em-que-a-populacao-pode-ter-saude-prejudicada/

4. Horta comunitária vira exemplo em Casa Amarela
http://www.diariodepernambuco.com.br/app/noticia/vida-urbana/2015/08/22/interna_vidaurbana,593847/horta-comunitaria-vira-exemplo-em-casa-amarela.shtml

5. O que é uma cidade inteligente?
http://fgvprojetos.fgv.br/noticias/o-que-e-uma-cidade-inteligente

6. A REDE DE DESIGN VERDE URBANO – UMA ALTERNATIVA SUSTENTÁVEL PARA MEGACIDADES? - Volker Minks
http://www.revistas.usp.br/revistalabverde/article/view/81089
