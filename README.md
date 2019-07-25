# Atualizacontas

##Sistema para atualizar contas

#1 MOTIVAÇÃO#

Este sistema web foi desenvolvido por mim, Washington da Costa Silva. E sua principal finalidade é servir como ferramenta de atualização de faturas de energia para constestação aos orgãos de proteção ao consumidor.

Requisitos do projeto:
- a) Persistência dos registros em arquivo.
- b) Cadastro de clientes de forma simplificada.
- c) Listagem de faturas por cliente cadastrado.
- d) Ordenação de faturas por ordem descrescente.
- e) Permitir editar faturas cadastradas.
- f) Permitir excluir faturas.
- g) Realizar a atualização de valores seguindo regra de calculo personalizada.

#2 SOBRE A APLICAÇÃO DESENVOLVIDA#

Foi utilizada a linguagem de programação PHP, juntamente com os frameworks de front-end: Bootstrap v3.3.7 e back-end CodeIgniter v3.1.2 (última versão disponível), aliados ao uso da linguagem de marcação de folhas de estilos CSS 3, HTML5, além do uso de trechos em JQuery. O layout da aplicação levou em consideração o conceito de mobile-first, já primariamente dotado pelo framework bootstrap, assim como a diagramação das páginas através do sistema de grids adotado pelo mesmo. Tornando assim o sistema responsivo e adaptado aos mais variados tamanhos de resolução. Através do CodeIgniter foi utilizado o padrão de arquitetura MVC (Model-View-Controler) para as entidades de clientes e faturas. O arquivo com os registros realizados pelo sistema pode ser encontrado dentro do diretório raiz da aplicação dados/registros.db, as demais pastas principais estão na pasta application (ex: controllers,models e views).

#2.1 Sobre as funcionalidades#

O acesso as funcionalidades principais do sistema é provido através da view faturas/index, como: adicionar, listar, excluir, editar. A view. 

#2.1.1 Funcionalidades Adicionais#

Foram adicionadas algumas funcionalidades como geração de relatórios de faturas, demonstrando o uso de responsive utilities do framework Bootstrap, no qual é possível diferenciar as informações que serão usadas em momento de impressão e as informações visualizadas em tela. 

#4 CONSIDERAÇÕES#

O cliente validou o projeto tendo assim atendido as expectativas e requisitos.

_**Buscando sempre a satisfação de vencer desafios, encontrei na área de T.I. a minha vocação para contribuir com a sociedade de forma plena e objetiva.**_


<right>Washington da Costa Silva</right>
 
