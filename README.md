# Visual.is Dashboard

Um dashboard interativo construído com PHP, MySQL e Chart.js que exibe estatísticas e métricas em diferentes tipos de gráficos.

## 🚀 Funcionalidades

- Gráfico de barras para estatísticas de produtos
- Gráficos circulares para métricas mensais
- Gráfico de linha para acompanhamento de clientes
- Integração com banco de dados MySQL
- Interface responsiva

## 📋 Pré-requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/Nginx)
- XAMPP (recomendado para ambiente de desenvolvimento)

## 🔧 Instalação

1. Clone o repositório:

```bash
git clone [URL_DO_SEU_REPOSITORIO]
cd [NOME_DO_REPOSITORIO]
```

2. Configure o banco de dados:

- O banco de dados será criado automaticamente ao acessar a aplicação
- As tabelas serão criadas e populadas com dados de exemplo

3. Configure o servidor web:

- Se estiver usando XAMPP, mova os arquivos para a pasta `htdocs`
- Acesse através de `http://localhost/[NOME_DA_PASTA]`

## 📦 Estrutura do Projeto

```
├── index.php          # Página principal do dashboard
├── config.php         # Configurações do banco de dados
├── get_data.php       # API para buscar dados
├── script.js          # JavaScript para os gráficos
├── styles.css         # Estilos CSS
├── database.sql       # Script SQL com a estrutura do banco
└── README.md         # Documentação
```

## 🛠️ Tecnologias Utilizadas

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Chart.js](https://www.chartjs.org/)
- [Bootstrap](https://getbootstrap.com/)

## ✨ Personalização

Para modificar os dados exibidos nos gráficos, você pode:

1. Acessar o phpMyAdmin
2. Selecionar o banco de dados "dashboard"
3. Modificar as tabelas:
   - `product_stats` (gráfico de barras)
   - `monthly_stats` (gráficos circulares)
   - `customer_stats` (gráfico de linha)

## 📄 Licença

Este projeto está sob a licença MIT - veja o arquivo [LICENSE.md](LICENSE.md) para detalhes
