<?php
//=============================================================================
// File:	ODO_TUTEX12.PHP
// Description: Example 8 for odometer graphs
// Created:	2002-02-22
// Author:      Johan Persson (johanp@aditus.nu)
// Version:	$Id$
// 
// Comment:
// Example file for odometer graph. This examples demonstrates the simplest
// possible graph using all default values for colors, sizes etc.
//
// Copyright (C) 2002 Johan Persson. All rights reserved.
//=============================================================================
include ("../../src/jpgraph.php");
include ("../../src/jpgraph_odo.php");

//---------------------------------------------------------------------
// Create a new odometer graph (width=250, height=200 pixels)
//---------------------------------------------------------------------
$graph = new OdoGraph(250,140);

//---------------------------------------------------------------------
// Add drop shadow for graph
//---------------------------------------------------------------------
$graph->SetShadow();

//---------------------------------------------------------------------
// Now we need to create an odometer to add to the graph.
// By default the scale will be 0 to 100
//---------------------------------------------------------------------
$odo = new Odometer(); 
$odo->SetColor("lightyellow");

//---------------------------------------------------------------------
// Add color indications
//---------------------------------------------------------------------
$odo->AddIndication(0,40,"green");
$odo->AddIndication(80,100,"red");

//---------------------------------------------------------------------
// Set display value for the odometer
//---------------------------------------------------------------------
$odo->needle->Set(70);

//---------------------------------------------------------------------
// Setup the second indicator needle
//---------------------------------------------------------------------
$odo->needle2->Set(44);
$odo->needle2->Show();
$odo->needle2->SetLength(0.5);
$odo->needle2->SetFillColor("navy");


//---------------------------------------------------------------------
// Add drop shadow for needles
//---------------------------------------------------------------------
$odo->needle->SetShadow();
$odo->needle2->SetShadow();

//---------------------------------------------------------------------
// Add the odometer to the graph
//---------------------------------------------------------------------
$graph->Add($odo);

//---------------------------------------------------------------------
// ... and finally stroke and stream the image back to the browser
//---------------------------------------------------------------------
$graph->Stroke();

// EOF
?>