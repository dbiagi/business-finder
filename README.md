Business Finder
=========

## Tecnologias utilizadas
| Ferramenta  | Versão |
| --------- | ------------- |
| [PHP](https://php.net)  | 5.6.*  |
| [Symfony Framework](https://symfony.com) | 3.2.6 |
| [Doctrine ORM](http://www.doctrine-project.org/) | 2.5.* |
| [Composer](https://getcomposer.org/)  | 1.2.*  |
| [Bower](https://bower.io/) | 1.8.* |
| [Materialize css](http://materializecss.com/) | 0.98 |
| [jQuery](https://jquery.com/) | 3.1.1 |

## Instruções para montar o projeto.
------------
### 1 - Clonar o repositório

```
git clone https://github.com/dbiagi/business-finder.git
```

### 2 - Baixar dependências

```
composer install
```
Após finalizado o download das dependências, será solicitado os dados de conexão com o banco. Preenche os dados corretamente pois depois dessa etapa será disparado um script para criar o banco de dados.
Caso não queira informar os dados do banco nessa etapa, será necessário criar o banco usando o seguinte comando

```
composer create-schema
```

### 3 - Baixar dependências de frontend

```
bower intall
```

## Acesso
admin:admin

## TODO
Criar container nginx e outro php e configurar os dois