#!/usr/bin/env bash

vagrant up
vagrant package
vagrant halt
vagrant destroy

rm -fr .vagrant
