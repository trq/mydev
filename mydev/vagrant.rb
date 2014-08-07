class MyDev
    def MyDev.configure(config, settings)

        config.vm.box      = settings["box"]      ||= "mydev"
        config.vm.box_url  = settings["box_url"]  ||= "https://www.dropbox.com/s/48t03idr7ka2y43/mydev.box?dl=1"
        config.vm.hostname = settings["hostname"] ||= "mydev.lcl"

        config.hostmanager.enabled = true
        config.hostmanager.manage_host = true

        config.vm.define config.vm.hostname do |node|
            node.vm.hostname = settings["host_name"]

            settings["ports"].each do |port|
                config.vm.network "forwarded_port", host: port["host"], guest: port["guest"]
            end
            node.vm.network :private_network, ip: settings["ip"] ||= "192.168.10.111"

            node.hostmanager.aliases = settings["host_aliases"] ||= []
        end

        config.vm.provision :hostmanager
        config.ssh.forward_agent = true

        config.vm.provider "virtualbox" do |vb|
            vb.customize ["modifyvm", :id, "--memory", settings["memory"] ||= "2048"]
            vb.customize ["modifyvm", :id, "--cpus", settings["cpus"] ||= "1"]
            vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
            vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        end

        config.vm.synced_folder '../../../', '/home/vagrant/src'

        if settings['shares']
            settings['shares'].each do |share|
                config.vm.synced_folder share['map'], share['to'], type: share['type'] ||= nil
            end
        end

        if settings['provisioning']
            settings["provisioning"].each do |(auth, scripts)|
                scripts.each do |script|
                    if auth == 'privileged'
                        config.vm.provision "shell", path: '../../../' + script, privileged: true
                    else
                        config.vm.provision "shell", path: '../../../' + script, privileged: false
                    end
                end
            end
        end
    end
end
