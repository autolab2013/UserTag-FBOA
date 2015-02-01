# UserTag-FBOA


User Classification
====

- Pokemon:
name style: category_version, version is number 1 to 3
	1. watcher: only watch blogs, few comments
		category: invisible
	2. commenter: a lot of comments
		1. emotion: good
			category: good
		2. bad
			category: bad 
- Trainer:
	3. writer:
		1. good
		2. bad
	
- user stats: 
	blogs written, comments made, comments emotion, blogs score
	
- logic:
	assign an specific avatar to a user
	Use blogs written and relative scores to evaluate a Trainer
	Use blogs read and comments made to evaluate a Pokemon:
		no comment: invisible
		have comments: 
			do sentimental analysis: good/bad

===
Presentation
---
show addtional user thumbnail on comment.
when user hover on the thumbnail, display a dialog shows user's stats(# of comments, # of blog written, # of blog watched)

===
Workflow
---
when user hover, trigur js to display dialog.
use alchemy api to analyze the user comment. 
set user thumbnail according to the returned result.
