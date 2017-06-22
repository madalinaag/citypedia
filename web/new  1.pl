is_int(0).
is_int(X) :- is_int(Y), X is Y+1.
minus(S,S,0).
minus(S,D1,D2) :- S>0, S1 is S-1, minus(S1,D1,D3), D2 is D3+1.

pitagora(X,Y,Z,N) :- int_triple(X,Y,Z,N), Z*Z =:= X*X + Y*Y.

int_triple(X,Y,Z,N) :- is_int(S), minus(S,X,S1), X>0, X<N,
                                  minus(S1,Y,Z), Y>0, Y<N.