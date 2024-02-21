import time
import discord
from discord.ext import commands
from dotenv import load_dotenv
import pyautogui as pg
import os
import sys
# Copyright © 2001-2023 Python Software Foundation; All Rights Reserved

discord_token = "DISCORD_TOKEN_OF_YOUR_BOT"
CHANNEL = 0000000000000000000  #channel id (general in Midjourney Image Download Server)
load_dotenv()
client = commands.Bot(command_prefix="*", intents=discord.Intents.all())
directory = os.getcwd()

# Coordinate
click_x = 947 # textbox on discord(x)
click_y = 816 # textbox on discord(y)
photo_woman_x = 1256 # bijin-ga on desktop(x)
photo_man_x = 1371 # musya-e on desktop(x)
photo_y = 297 # top bijin-ga & musya-e on desktop(y)
photo_interval = 106 # vertical spacing of images
drag_x = 227 # leftmost　space to upload images on discord(x)
drag_y = 752 # space to upload images on discord(y)
drag_interval = 123 # horizontal spacing of space to upload images on discord
sex = int(sys.argv[1])

def blend_image(sex):   # man:0 woman:1
    if(sex == 0):
        photo_x = photo_man_x
    else:
        photo_x = photo_woman_x

    time.sleep(3)
    pg.press('tab')
    time.sleep(3)
    pg.write('/blend')
    time.sleep(3)
    pg.press('tab')

    # make space for image3-5
    for j in range(3):
        pg.moveTo(click_x, click_y)
        pg.click()
        pg.write('image' + str(j+3))
        pg.press('enter')

    # drag and drop
    pg.moveTo(photo_man_x, photo_y)
    pg.dragTo(drag_x, drag_y, 1, button='left')
    for j in range(4):
        pg.moveTo(photo_x, photo_y + photo_interval * (j+1))
        pg.dragTo(drag_x + drag_interval * (j+1), drag_y, 1, button='left')    
    return

@client.event
async def on_ready():
    print("Bot connected")
    channel = client.get_channel(CHANNEL) 
    pg.moveTo(click_x, click_y)
    pg.click()
    await channel.send(sex)

@client.event
async def on_message(message):
    global prompt_counter
    msg = message.content
    print(message)

    # Start Automation by typing 0/1 in the discord channel
    if msg == '0':      # enter
        blend_image(0)
    elif msg == '1':
        blend_image(1)
    else:
        print("Invalid number")
        return
    time.sleep(2)
    pg.moveTo(click_x, click_y)
    pg.click()
    pg.press('enter')
    time.sleep(5)

    print("finish")

    # Stop Automation once all prompts are completed
    quit()

client.run(discord_token)
