A Boilerplate for Wordpress Using Chef, Vagrant and Capistrano
==========================

You can use this project to get started using [our cookbook](https://github.com/Design-Collective/wordpress-cookbook1/blob/master/README.md).

The cookbooks

Local Development
=================

This project boilerplate includes a Berkshelf File, Thorfile, Vagrant and Knife.rb. The wp-content-guest is where the synced files (wp-content) files will be located once the VM is deployed.

Just fork our repo and run 
`$ vagrant up`

For mopre information, visit: 
[Vagrant and and Chef to deploy precongifured Virtual Machines for Wordpress Local Development](http://www.designcollective.io/blogs/preconfigured-wordpress-vm-via-chef-vagrant-berkshelf)

Note: You must install the following requirements before you get started.

* Vagrant
* Berkshelf
* Berkshelf Vagrant
* Chef
* Virtual Box

Deployment
==========

1. Provision the server with chef or chef-solo using the above cookbook. This installs Wordpress into `/srv/www/wordpress` on the server, moves wp-content into the document root and configures the wp-config.php file on the fly.

2. Visit the url of your box and complete the WordPress installation.

3. After installation, configure your capistrano server files in `/config/deploy`.
You can choose the folder where your repository will be installed on the server, and you need to make sure that the `:document_root` variable points to where your wordpress is currently installed.

4. Deploy your code, for example:

`$ cap production deploy`

This creates the :deploy_to folder (default: `/srv/git`); on the first run, renames the unversioned `wp-content/themes` folder from the document_root into themes_old and symlinks `wp-content/themes` to point to `/srv/git/current/wp-content/themes`, effectively making your themes folder versioned.

#TODO
1. Ability to include plugins into a repository for initial deploy. For now, the plugins folder in the repo is linked (persisting across releases).
