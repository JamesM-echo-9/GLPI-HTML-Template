# Changelog

All notable changes to the GLPI HTML Templates project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0] - 2026-02-25

### Changed
- Migrated GLPI email template to a table-based layout for Outlook compatibility.
- Enhanced CSS with standard email bug fixes and support for MSO overrides.
- Updated UNIDESK branding in example reference to Echo-9, including the original E9-logo (scaled down by 50% for optimal sizing).
- Updated Base64 encoded logo to use the `E9-logo.png` file, resized mathematically to a 50% scale (240px width) of its previous implementation.

## [1.0.0] - 2026-02-25

### Added
- Initial creation of the GLPI ticket email template (`glpi_template.html`).
- Extracted CSS styling into a separate file (`glpi_styles.css`) for easy insertion into GLPI's CSS field.
- Embedded company logo using Base64 encoding to bypass email client image blocking (`logo_base64.txt`).
- Created `README.md` with detailed installation and usage instructions.
- Created `CHANGELOG.md` to track project history.
- Created `TODO.md` to track future enhancements.
