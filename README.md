# Medium RSS Reflector
A simple script to reflect the RSS feed from Medium, removing the gif/stats images they put in it so it can be sent as a Mailchimp campaign. I built this because all the solutions online required use of a third-party "rss feeder" which could go down at any time. I'm not a fan of relying on other people's stuff, so I built this.

## Background
MailChimp has a "automatically resize RSS images to fit my template" feature so it displays nicely in email format. Problem is, Medium's 1x1 pixel tracker is included, so most often than not a huge whitespace appears in your email - which is not good. This stops that.

## Installation & Usage
There's two ways to use this. Either you can edit the `.env` file or simply pass a URL as a parameter like so: `http://mywebsite.com/reflector/?url=http://someothersite.com/rss`

Note: passing the `url` param will override the default.

1. Clone the repo to a public facing URL
2. Edit the `.env` file to include your vars (optional)
3. Point your mailchimp campaign to the URL of the reflector (with or without the `url` param)
4. ??????
5. Profit

## Authors
- Scott McGready [@ScottMcgready]

## License
MIT License. See the `LICENSE` file for further licensing information. 
   [@ScottMcGready]: <https://twitter.com/scottmcgready>
