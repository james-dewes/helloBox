try:
    import RPi.GPIO as GPIO
except RuntimeError:
    print("Error importing Rpi.GPIO")

GPIO.setmode(GPIO.BCM)
GPIO.setup(24, GPIO.OUT)
