# Rephormat

**NOTE**: This application is still in early development!
It does not work right now.

---

Rephormat is a Phabricator application that allows you to import tickets from
other task trackers.

## Installation
1. Download the latest release, unzip,
   and put it in `<path to phabricator>/phabricator/src/applications/rephormat`.
1. (optional) If you use a different namespace, update the first line of all
files in the `sql` directory.
1. Apply all of the changes, in order, from the `sql` directory.
1. In `<path to phabricator>/phabricator` run the following command:
   ` ../arcanist/bin/arc liberate`.  This updates Phabricator's caches, allowing
   Rephormat to "exist."

## FAQ

### My Phabricator refuses to update after instalilng this application.
This is due to the `arc liberate` command, which updates a file that is committed
into the Phabricator main repository.  To upgrade:
1. Revert the changes to `<path to phabricator/phabricator/src/__phutil_library_map__.php`.
1. Run a git pull like normal.
1. In `<path to phabricator>/phabricator` run the following command:
   ` ../arcanist/bin/arc liberate`.

These steps will need to be run every time you pull.

### Why are you using GitHub?  Since this is a Phabricator application, shouldn't you use Phabricator?
Excellent question.  Yes, I am hosting this repository on GitHub.  The reason is
that I don't have the money to host my own Phabricator instance at this time.
And while I do have a free instance in Phacility's cloud, that means I can't
allow everyone to file bug reports.

One day, I will move this application to its own Phabricator instance.  I'll keep
the GitHub repository around, thanks to the magic of Diffusion.
