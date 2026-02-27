# GLPI Ticket Email Template

This repository contains a custom HTML and CSS email template for GLPI notifications. It features a modern, clean design and includes an embedded Base64 logo so that images display reliably in most email clients without needing to be hosted externally.

## Files Included

- `glpi_template.html`: The main HTML structure containing GLPI tags (e.g., `##ticket.title##`, `##ticket.content##`).
- `glpi_styles.css`: The styling rules for the email template.
- `logo_base64.txt`: The base64 encoded string of the company logo.

## Installation Instructions

To install this template in your GLPI environment, follow these detailed steps:

### 1. Access Notification Templates
1. Log in to your GLPI instance with an account that has **Super-Admin** privileges.
2. From the main menu, navigate to **Setup** > **Notifications** > **Notification templates**.

### 2. Select or Create a Template
1. You can either create a new template by clicking **Add** or modify an existing one (for example, the default `Tickets` template).
2. If modifying an existing template, click on the template name to open it.
3. Go to the **Template translations** tab on the left sidebar.
4. Click on the translation/language you wish to update (e.g., `Default translation` or `English`).

### 3. Update the HTML Content
1. Open the downloaded `glpi_template.html` file in a text editor (like VS Code or Notepad).
2. Copy the entire contents of the file.
3. In GLPI, locate the **HTML body** field within the translation settings.
4. If you see a WYSIWYG editor (like TinyMCE), click the **Source code** button (usually represented by `< >`) to view the raw HTML.
5. Paste the copied HTML content into the source code view and click **Save** or **Ok**.

### 4. Update the CSS Content
1. Open the downloaded `glpi_styles.css` file in a text editor.
2. Copy the entire contents of the file.
3. In GLPI, scroll to the **CSS** field within the template translation page.
4. Paste the copied CSS content into this field.
5. Click the **Save** button at the bottom of the page to apply your changes.

### 5. Testing
1. To ensure the template looks as expected, generate a test notification. You can do this by creating a test ticket or adding a followup to an existing ticket, depending on which notification event this template is attached to.
2. Check your email client to verify that the layout is correct and the logo displays properly.

## Important Notes

- **Tags:** The template uses standard GLPI tags (e.g., `##ticket.title##`, `##ticket.description##`). Make sure these correspond to the data you want to display. If you apply this template to items other than tickets (e.g., Changes, Problems), you will need to update the tags accordingly.
- **Base64 Images:** The logo is embedded directly into the HTML using Base64 encoding. This prevents the "Click here to download pictures" warning in Outlook and other email clients. If you ever need to update the logo, encode the new image to Base64 and replace the `src` attribute of the `<img>` tag in `glpi_template.html`.
