sc-website
==========

Website for Shimara Carlow currently live at www.shimara.com

I wrote this site for my partner's jewellery business

A lot of the code to implement a shopping cart for the trade section of the website has been written but not implemented as yet due to business reasons, for this reason the security on the site is just a sham

Some problems include
 - It's not hosted on https
 - trade password encryption done client side in java script, trivial to break
 - encryption is sha1 done in javascript which has been proven to be broken several times
 
 There is nothing sensitive to lose at the moment so it isn't a real issue
 
 There are some other minor problems with the website 
 - determinig user location is not 100% accurate, it was written a while ago and there was no free method of determining a user location so it's been handrolled and is not IPv6 compliant.
