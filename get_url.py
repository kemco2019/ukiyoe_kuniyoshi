import discord
from discord.ext import commands
# Copyright © 2001-2023 Python Software Foundation; All Rights Reserved

discord_token = "MTEwMTM1OTU2MjA3NTk0NzA5OQ.G2lZ1p.q6WH3HbcMBAPBQ3bpSij2JTrLbG_d7Yp-pFr5k"  # ukiyoe-bot
client = commands.Bot(command_prefix="*", intents=discord.Intents.all())

@client.event
async def on_ready():
    print("Bot connected")

@client.event
async def on_message(message):
    for attachment in message.attachments:
        f = open('myfile.txt', 'a')
        f.write(attachment.url)
        f.write("\n")
        f.close

# Enter the Discord Bot token to activate the bot
client.run(discord_token)
