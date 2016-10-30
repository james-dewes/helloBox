try:
    from capture import capture
except RuntimeError:
    print("unable to import capture")

import time
import gzip
import json
import os
import subprocess
from multiprocessing import Process

camera = capture()
def func1():
    os.system('arecord -d 10 -c 1 -D plughw:1,0 -v -r 48000 -t wav -f S16_LE -M audio.wav', shell=True)

def func2():
    camera.start_capture()

p1 = Process(target = func1)
p1.start()
p2 = Process(target = func2)
p2.start()
time.sleep(10)
camera.stop_capture()
##print("capture complete. Zipping")
gzip.GzipFile('example.h264')
result = {"complete":True}
print json.dumps(result)
