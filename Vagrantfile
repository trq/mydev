VAGRANTFILE_API_VERSION = "2"

path = "#{File.dirname(__FILE__)}"

require 'yaml'
require path + '/mydev/vagrant.rb'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  MyDev.configure(config, YAML::load(File.read(path + '/../../../mydev.yml')))
end
