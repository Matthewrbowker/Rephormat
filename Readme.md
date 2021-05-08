# Rephormat

**NOTE**: This application is still in early development!
It does not work right now.

---

Rephormat is a Phabricator application that allows you to import tickets from
other task trackers.

## Installation
1. Download the latest release, unzip,
   and put it in `/var/srv/phab/libext/rephormat`.
1. TODO: Database stuff
1. Update the configuration option: `./config set load-libraries '{"sprint":"/var/srv/phab/libext/rephormat"}'`

## FAQ

### Why are you using GitHub?  Since this is a Phabricator application, shouldn't you use Phabricator?
Excellent question.  Yes, I am hosting this repository on GitHub.  The reason is
that I don't have the money to host my own Phabricator instance at this time.
And while I do have a free instance in Phacility's cloud, that means I can't
allow everyone to file bug reports.

One day, I will move this application to its own Phabricator instance.  I'll keep
the GitHub repository around, thanks to the magic of Diffusion.
