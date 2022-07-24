# Python3 version
# How to use: Create a text file, and write down the name of the file you want to create in every new line. Place this script and the name list file in the folder where you want to create your files, and run it. It will create all the new files in that folder. It automatically removes all the characters that might cause an error.
import sys


def get_userinput():
    name = str(input(
        "Enter the full file name including extension. Place $ where you want the file number: "))
    if '$' not in name:
        print("You did not specify the $ symbol in your file name. Please include $ in your file name.")
        get_userinput()
    elif '.' not in name:
        print("You did not specify the file extension. Please include the extension.")
        get_userinput()
    else:
        num = int(input("How many copies do you want: "))
    return name, num


if len(sys.argv) == 1:
    name, num = get_userinput()
    for i in range(0, num):
        open((name.replace('$', str(i))), "w+")
    print(str(num) + " files created.")
    exit(0)

elif len(sys.argv) == 2 and ('.' in sys.argv[1]):
    try:
        f = open(str(sys.argv[1]), "r")
    except:
        print("FAILED: Could not open " + str(sys.argv[1]))
        exit(0)

    if f.mode == "r":
        filelist = f.readlines()
    else:
        print("Error encountered while reading " + str(sys.argv[1]))
        exit(0)

    cleanlist = []

    j = 0
    while j < len(filelist):
        if not '.' in filelist[j]:
            print("SKIPPED: MISSING EXTENSION: " + filelist[j].rstrip('\n'))
            j = j + 1
            continue

        if filelist[j].rstrip('\n') not in cleanlist:
            cleanlist.append(filelist[j].rstrip('\n'))
        else:
            print("SKIPPED: DUPLICATE: " + filelist[j].rstrip('\n'))
        j = j + 1

    for e in cleanlist:
        open(str(e.translate(None, r'/\:*?"<?|')), "w+")
    print(str(len(cleanlist)) + " files created.")
    if not len(filelist) - len(cleanlist) == 0:
        print(str(len(filelist) - len(cleanlist)) + " list entries ignored due to duplicates or missing extension.")

else:
    print("Either run the script without arguments, or pass the file name of a text file containing a list of files to be created.")
    exit(0)
