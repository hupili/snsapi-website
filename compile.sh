#!/bin/bash

PY_BIN="/usr/local/bin/python"
#PY_BIN="python"

# Preprocessing
cd down
$PY_BIN gettags.py
cd -

# Generate HTML from MD
for fmd in "index.md" "news/index.md" "down/index.md" "2013summer/index.md"
do
	echo $fmd
	file=${fmd%.md}	
	echo $file
	${HOME}/utils/evermd -o $file.html -t $file.t.html -n '\[% body %\]' $file.md
done

cd blog ; bash ./compile.sh; cd - &> /dev/null

exit 0 
