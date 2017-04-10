![PHP Server Monitoring Application](https://s3.eu-west-2.amazonaws.com/portfolio-resources/Github/PHP-Server-Monitoring.png)

# PHP Server Monitoring (PHPSM)
PHP Server Monitoring - Manage servers from one place. Track the progress of servers over time.

# PHP Server Monitoring's Purpose
PHP Server Monitoring is built with simplicity in mind. PHPSM uses Ajax requests to build the understanding of a server / server's hardware such as CPU, Memory, Disk Usage.

PHPSM tries to achieve the simplest form of server monitoring with a main server handling the requests from all the other "tracked" servers.

The main server stores all the information about multiple servers the data is sent from the "tracked" servers using routines from my other directory [PHP Routine System](https://github.com/AceXintense/PHP-Routine-System).

# PHPSM Development
The routines are currently a work in progress and will need some extensive testing to make sure that almost all server hardware is supported. 

# PHPSM Issues
There are issues currently with making the cpu frequency get sent across from a raspberry pi because lscpu does not provide the current MHz used on the server.

# PHPSM Foundations
PHPSM's routine system is built on the PHP Routine System developed by me the repository will include all the scripts that are needed to send data to the server.

# PHPSM API Endpoints
## Initialization of a server
	/api/initializeServer
### Parameters
	serverId : string
	serverName : string

## Update server name
	/api/updateServerName
### Parameters
	serverId : string
	serverName : string
## CPU
	/api/uploadCPU
### Parameters
	serverId : string
	cpuCores : integer
	cpuCoreTemperature : string
	cpuCoreFrequency : string
	cpuCoreLoad : string

## Memory
	/api/uploadMemory
### Parameters
	ServerId : string
	memoryModules : integer
	memoryFrequency : string
	memoryUsage : string

## Disk
	/api/uploadDisk
### Parameters
	serverId : string 
	diskCount : integer
	diskCapacity : integer
	diskUsage : integer