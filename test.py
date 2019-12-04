#! /usr/bin/env python
# coding:utf-8
# tcp_server

from __future__ import print_function
import socket
import threading
import re
import argparse


bind_ip = '160.16.222.135'
bind_port = 50000
server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
server.bind((bind_ip, bind_port))
server.listen(5)
print('[*] lisetn %s:%d' % (bind_ip, bind_port))

def handle_client(client_socket):
	bufsize = 1024
	print("[*] receivint message from client...\n")
	message = client_socket.recv(bufsize)
	print(message)
	print()
	print("[*] input pump mode")
	print("[*] >> ", end="")
	response = input()
	if response == 'q':
		client_socket.close()
		return False
	print("[*] sending message to client...\n")
	client_socket.send(response)
	client_socket.close()
	return True

flag = True
while flag:
	client, addr = server.accept()
	print('[*] connected from: %s:%d' % (addr[0],addr[1]))
	flag = handle_client(client)

