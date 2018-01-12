Open Source Social Network (OSSN) [5.0-DEV] 
======================================

Opensource-Socialnetwork (OSSN) is a social networking software written in PHP. It allows you to make a social networking website and helps your members build social relationships, with people who share similar professional or personal interests.

OSSN is released under the ***Open Source Social Network License (OSSN LICENSE) v3.0***

Original Project can be found at: https://github.com/opensource-socialnetwork

## About Project

This Project aims to develop smart communities using OSSN by enabling cross community interaction and community management. The project setup is deployed on AWS in which we have several instances of OSSN deployed on EC2 servers. I have used elastic file search (EFS) for cache data for every community. Cross community interaction happens by storing messages in a relational database hosted on AWS RDS. I have used auto-scaling to create new community (OSSN) instances dynamically based on network usage. All the setup is provided with appropriate security groups and under one VPC.

I have also created a dashboard where we can create/start/stop/delete communities (ossn instances hosted on EC2) dynamically using AWS API for PHP. The dashboard is used to manage instances. and can create new ones using the stored AMIs.

## Link to demo video: [Smart Community](https://www.dropbox.com/s/434m3y0mc7sgfl6/demoproj.avi?dl=0)


