# CiviCRM Credit Note Disabler

[![CircleCI](https://circleci.com/gh/greenpeace-cee/at.greenpeace.creditnope.svg?style=svg)](https://circleci.com/gh/greenpeace-cee/at.greenpeace.creditnope)

This extension disables the generation of credit note IDs for cancelled
contributions. The generation of credit note IDs tends to cause performance
issues on sites with many contributions.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.0+
* CiviCRM 5.20

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl at.greenpeace.creditnope@https://github.com/greenpeace-cee/at.greenpeace.creditnope/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/greenpeace-cee/at.greenpeace.creditnope.git
cv en creditnope
```

## Usage

After installation, credit note IDs will no longer be generated when
contributions are cancelled.
