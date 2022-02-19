pipeline {
    agent any

    stages {
        stage('Clonar projeto') {
            steps {
                git branch: 'main', url: 'https://github.com/FelipeRBDantas/cat-backend.git'
            }
        }
        stage('Criar o arquivo .env') {
            steps {
                powershell 'cp .env.example .env'
            }
        }
        stage('Iniciar o container') {
            steps {
                powershell 'docker-compose up -d'
            }
        }
        stage('Executar o bash') {
            steps {
                powershell 'docker-compose exec -it the_cat_backend bash'
            }
        }
        stage('Instalar dependências') {
            steps {
                powershell 'composer install'
            }
        }
        stage('Gerar a chave') {
            steps {
                powershell 'php artisan key:generate'
            }
        }
        stage('Migrar as tabelas') {
            steps {
                powershell 'php artisan migrate'
            }
        }
    }
}
