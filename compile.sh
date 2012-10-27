#!/bin/bash

for fmd in "index.md" "news/index.md" "down/index.md"
do
	echo $fmd
	file=${fmd%.md}	
	echo $file
	${HOME}/utils/evermd -o $file.html -t $file.t.html -n '\[% body %\]' $file.md
done

cd blog ; bash ./compile.sh; cd - &> /dev/null

exit 0 
