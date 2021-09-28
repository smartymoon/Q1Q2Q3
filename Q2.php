<?php

class Node
{
    public function __construct(
        public int $value, 
        public Node | null $left_node = null,
        public Node | null $right_node = null,
    ){}
}


function makeTree()
{
    return new Node(1,
                new Node( 2,
                    new Node(4, 
                        new Node(5),
                        new Node(6)
                    ),
                    new Node(8,
                        new Node(9),
                        new Node(10,
                            new Node(15),
                            new Node(16, 
                                new Node(23, 
                                    new Node(25),
                                ),
                                new Node(24),
                            ),
                        )
                    )
                ),
                new Node(3,
                    new Node(7,
                        new Node(11),
                        new Node(12)
                    ),
                    new Node(8,
                        new Node(13,
                            new Node(17),
                            new Node(18,
                                new Node(19),
                                new Node(20, 
                                    new Node(21),
                                    new Node(22),
                                )
                            ),
                        ),
                        new Node(14)
                    )
                )
    );
}

$tree = makeTree();

function getNodesOfDepth(Node $tree, int $depth)
{
    if ($depth < 1) {
        return 'depth should greater than 1';
    }

    if ($depth === 1) {
        return [$tree->value];
    }

    $toReturn = [];

    $check = function($node, $current_depth) use (&$toReturn, &$check) {
        if (is_null($node)) return;        
        if ($current_depth === 1) {
            $toReturn[] = $node->value;
        } else {
            $check($node->left_node, $current_depth - 1);
            $check($node->right_node, $current_depth - 1);
        }
    };

    $check($tree, $depth);

    return $toReturn;
}


print_r(getNodesOfDepth($tree, 1));
print_r(getNodesOfDepth($tree, 2));
print_r(getNodesOfDepth($tree, 3));
print_r(getNodesOfDepth($tree, 4));
print_r(getNodesOfDepth($tree, 5));
print_r(getNodesOfDepth($tree, 6));
print_r(getNodesOfDepth($tree, 7));
print_r(getNodesOfDepth($tree, 8));
