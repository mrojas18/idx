# To learn more about how to use Nix to configure your environment
# see: https://developers.google.com/idx/guides/customize-idx-env
{pkgs}: {
  # Which nixpkgs channel to use.
  channel = "stable-23.11"; # or "unstable"
  # Use https://search.nixos.org/packages to find packages
  packages = [
    pkgs.php82
    pkgs.php82Packages.composer
    pkgs.php82Extensions.xdebug
    pkgs.nodejs_20
    pkgs.sqlite
    pkgs.memcached
  ];
  # Sets environment variables in the workspace
  env = {};
  idx = {
    # Search for the extensions you want on https://open-vsx.org/ and use "publisher.id"
    extensions = [
      # "vscodevim.vim"
      "amiralizadeh9480.laravel-extra-intellisense"
      "bmewburn.vscode-intelephense-client"
      "mhutchie.git-graph"
      "xdebug.php-debug"
    ];
    # Enable previews and customize configuration
    previews = {
      enable = true;
      previews = {
        web = {
          command = ["php" "artisan" "serve" "--port" "$PORT" "--host" "0.0.0.0"];
          manager = "web";
        };
      };
    };
  };
  services.mysql={
    enable = true;
    package= pkgs.mysql80; 
  };
}
