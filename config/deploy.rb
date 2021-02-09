# ./config/deploy.rb

lock '3.15.0'
set :application, 'myForum'
set :repo_url, 'https://github.com/gcamrit/laravel-capistrano.git'
# Default branch is :master
set :branch, ENV["branch"] || "master"
# Default deploy_to directory is /var/www/laravel-capistrano
set :deploy_to, '/home/cld2_7/cld2-7.mycpnv.ch/'
set :use_sudo, false
set :laravel_set_acl_paths, false
set :laravel_set_chgrp, false
set :laravel_upload_dotenv_file_on_deploy, false
set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --optimize-autoloader'

SSHKit.config.command_map[:composer] = "php -d allow_url_fopen=true #{shared_path.join('composer')}"

# Copy .env in the current release
task :copy_dotenv do
    on roles(:all) do
      execute :cp, "#{shared_path}/.env #{release_path}/.env" 
    end
  end
after  'composer:run', 'copy_dotenv'
after  'copy_dotenv', 'laravel:migrate'
append :linked_dirs, 
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs'
namespace :composer do
    desc "Running Composer Install"
    task :install do
        on roles(:composer) do
            within release_path do
                execute :composer, "install --no-dev --quiet --prefer-dist --optimize-autoloader"
            end
        end
    end
end
namespace :laravel do
    task :fix_permission do
        on roles(:laravel) do
            execute :chmod, "-R ug+rwx #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
            execute :chgrp, "-R www-data #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
        end
    end
    task :configure_dot_env do
    dotenv_file = fetch(:laravel_dotenv_file)
        on roles (:laravel) do
        execute :cp, "#{dotenv_file} #{release_path}/.env"
        end
    end
end
namespace :deploy do
    after :updated, "composer:install"
end