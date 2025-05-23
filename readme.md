connectord/base
===============

The connectord/base image provides a starting point for building new connectord projects. It includes:

* A basic web runtime
* A basic job scheduler that can accept a PHP class
* Encrypted secrets storage, log storage
* Framework for synchronizing data to an external RDBMS

Every connector, in turn, is ultimately a PHP class which exposes its own config requirements to drive the UI,
handles its own logic when executing in various modes, writes its own logs, etc.

To keep things lightweight, we won't have a complicated frontend build system - simple static scripts with minimal
styling all the way.