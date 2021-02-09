# config/deploy/production.rb
server 'cld2-7.mycpnv.ch', user: 'cld2_7', roles: %w{web app laravel composer}
set :ssh_options, {
    keys: %w(/home/rossier/.ssh/capistrano), 
    forward_agent: false,
    auth_methods: %w(publickey)
  }