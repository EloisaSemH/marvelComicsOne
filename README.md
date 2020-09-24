# Marvel Comics One
Sistema de busca de quadrinhos e personagens da Marvel Comics utilizando API da própria.

Criado para a atividade avaliativa da matéria de Desenvolvimento para Servidores, do quarto semestre do curso de Sistemas para a Internet da Faculdade de Tecnologia de São Roque (FATEC-SR).



# Como configurar?


Após obter a pasta em seu servidor local, crie uma conta no site de desenvolvedor da Marvel:
https://developer.marvel.com/signup


Depois da criação e aceitação dos termos de uso, vá em:

"Get a Key" -> se não estiver logado.

"my Developer Account" -> se estiver logado.


Abra o arquvo em sua pasta na seguinte localização: 
config/configkey.txt

Copie sua private key e cole após o sinal de igual em "private=".

Copie sua public key e cole após o sinal de igual em "public=".

Você pode escolher o timestamp de sua preferência ou não alterar.

Salve o arquivo.

Pronto! 
Seu sistema já está pronto para rodar!


ATENÇÃO!

Caso faça upload desse projeto em um host, certifique-se de redirecionar o domínio para a pasta "public_html".



# Como funciona?

Utilizando requisições em cUrl, com PHP, essa aplicação puxa os dados do banco de dados sobre quadrinhos oficial da Marvel, disponibilizada pelos mesmos.

E mais!

Para páginas sobre únicas - sobre o quadrinho, personagem, evento etc - ainda há uma API de tradução! Mas, como toda API gratuita de tradução, há uma limitação de requisições por dia. Quando atingido esse limite, ficará disponível o texto original, em inglês americano.



# Saiba mais

Para mais informações sobre a API da Marvel:

Site para o desenvolvedor: https://developer.marvel.com/

Documentação: https://developer.marvel.com/docs



Para mais informações sobre a API gratuita de tradução:

Site da MyMemory: https://mymemory.translated.net/

Documentação: https://mymemory.translated.net/doc/spec.php
