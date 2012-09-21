#!/bin/bash

for fmd in "index.md" 
do
	echo $fmd
	file=${fmd%.md}	
	echo $file
	evermd -o $file.html -t $file.t.html -n '\[% body %\]' $file.md
done

exit 0 
