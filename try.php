 <style>
.circle-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #3498db;
  display: flex;
  justify-content: center;
  align-items: center;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}

.circle-icon i {
  font-size: 24px;
  color: #fff;
}


</style>
<div class="circle-icon">
<i class="fas fa-comment"></i>
</div> 


